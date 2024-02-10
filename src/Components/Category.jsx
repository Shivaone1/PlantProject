import React, { useState } from 'react'

export default function Category() {
    const [category, setCategory] = useState({
        name: 'shiva',
        mobile: 9849302233,
        city: 'Noida'
    });
    return (
        <>
            <h1>Category List</h1>
            <div className="container">
                <p>Name : {category.name}</p>
                <p>mobile : {category.mobile}</p>
                <p>city : {category.city}</p>
            </div>
        </>
    )
}
