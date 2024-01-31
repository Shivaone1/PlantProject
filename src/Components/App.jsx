import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Navbar from './Navbar';
import Product from './Product';
import UploadImage from './UploadImage';
import Error from "./Error";
import ProductList from './ProductList';

export default function App() {
  return (
    <>
      <BrowserRouter>
        <Navbar />
        <Routes>
          {/* <Route path="/home" element={<Home />} /> */}
          <Route path="/Product" element={<Product />} />
          <Route path="/uploadImage" element={<UploadImage />} />
          <Route path="/ProductList" element={<ProductList />}/>
          <Route path="/*" element={<Error />} />
        </Routes>
      </BrowserRouter>
    </>
  );
}
