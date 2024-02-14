import React, { useState, useEffect } from 'react';


export default function Product() {
    const [data, setData] = useState([]);

    useEffect(() => {
        const newData = async () => {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/category');
                const responseData = await response.json();
                // console.log(responseData.Data[0]);
                // console.log(Array.isArray(responseData.Data));
                setData(responseData.Data)
            } catch (error) {
                console.log('error Fetching Data...', error)
            }
        }
        newData()
        // const newData = [];
        // for (let i = 1; i <= 10; i++) {
        //     newData.push({
        //         id: i,
        //         title: `Mouse ${i}`,
        //         category: `${i}`,
        //         price: Math.floor(Math.random() * 100) + 1
        //     });
        // }
        // setData(newData);
    }, []);
    return (
        <>
            <div className="container">
                <form action="" method="post" className='mb-2'>
                    <div className='row d-flex'>
                        <div className="col-md-2">
                            <label for="year">Year</label>
                            <select name="year" id="yearSearch" className='form-control'>
                                <option value="">Select Year</option>
                            </select>
                        </div>
                        <div className="col-md-2">
                            <label for="day">Day</label>
                            <select name="day" id="day" className='form-control'>
                                <option value="">Select day</option>
                            </select>
                        </div>
                        <div className="col-md-2">
                            <label for="category">Category</label>
                            <select name="category" id="category" className='form-control'>
                                <option value="">Select category</option>
                            </select>
                        </div>
                        <div className="col-md-2">
                            <label for="product">Product</label>
                            <select name="product" id="product" className='form-control'>
                                <option value="">Select product</option>
                            </select>
                        </div>
                        <div className="col-md-2">
                            <label for="tag">Tag</label>
                            <select name="tag" id="tag" className='form-control'>
                                <option value="">Select tag</option>
                            </select>
                        </div>
                        <div className="col-md-2 d-flex mt-3">
                            <input type="button" className='form-control bg-info' value="Clear" />
                            <input type="button" className='form-control bg-success' value="Search" />
                        </div>
                    </div>
                </form>
                <table className="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
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
                                <td>Category-{item.category}</td>
                                <td>Product</td>
                                <td>{item.price}</td>
                                <td>
                                    <i className='btn btn-info fa fa-eye'> View</i>
                                    <i className='btn btn-danger fa fa-trash'> Delete</i>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    )
}
