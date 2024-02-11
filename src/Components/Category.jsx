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
            <h1>Category List</h1>
            <div className="container">
                <div className="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        {category && category.map((item, index) => (
                            <tr>
                                <td key={index}>{index+1}</td>
                                <td>{item.title}</td>
                            </tr>
                        ))}
                    </tbody>
                </div>
            </div>
        </>
    )
}
