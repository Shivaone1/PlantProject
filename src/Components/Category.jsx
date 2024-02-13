import React, { useEffect, useState } from 'react'

export default function Category() {

    const [category, setCategory] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/category');
                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }
                const data = await response.json();
                // console.log(Array.isArray(data.Data));
                if (Array.isArray(data.Data)) {
                    setCategory(data.Data);
                } else {
                    console.error('Data is not an array:', data.Data);
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        fetchData();
    }, []);


    return (
        <>
            <div className="container">
                <h1 className='text-center'>Category List</h1>
                <div className="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {category && category.map((item, index) => (
                            <tr>
                                <td key={index}>{index + 1}</td>
                                <td>{item.title}</td>
                                <td>{new Date(item.created_at).toLocaleDateString('en-IN')}</td>
                                <td><i className="btn btn-success fa fa-eye">View</i> <i className="btn btn-danger fa fa-trash">Delete</i></td>
                            </tr>
                        ))}
                    </tbody>
                </div>
            </div>
        </>
    )
}
