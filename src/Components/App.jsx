import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Navbar from './Navbar';
import Product from './Product';
import UploadImage from './UploadImage';
import Error from "./Error";
import Category from './Category';
import Index from './Index';

export default function App() {
  return (
    <>
      <BrowserRouter>
        <Navbar />
        <Routes>
          <Route path="/Home" element={<Index />} />
          <Route path="/Product" element={<Product />} />
          <Route path="/uploadImage" element={<UploadImage />} />
          <Route path="/CategoryList" element={<Category />} />
          <Route path="/*" element={<Error />} />
        </Routes>
      </BrowserRouter>
    </>
  );
}
