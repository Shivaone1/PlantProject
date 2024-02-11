import React, { useEffect, useState } from 'react'

export default function Category() {

    const [category, setCategory] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/index');
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
                {category && category.map((item, index) => (
                    <p key={index}>Name: {item.title}</p>
                ))}
            </div>
        </>
    )
}
