import React, { useState, useEffect } from 'react';

export default function ProductList() {
    const [data, setData] = useState([]);

    useEffect(() => {
        const newData = [];
        for (let i = 1; i <= 10; i++) {
            newData.push({
                id: i,
                title: `Mouse ${i}`,
                price: Math.floor(Math.random() * 100) + 1
            });
        }
        setData(newData);
    }, []);

    return (
        <div className="container">
            <table className="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {data.map((item) => (
                        <tr key={item.id}>
                            <td>{item.id}</td>
                            <td>{item.title}</td>
                            <td>Product</td>
                            <td>{item.price}</td>
                            <td>
                                <i className='fa fa-eye'> View</i>
                                <i className='fa fa-trash'> Delete</i>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
