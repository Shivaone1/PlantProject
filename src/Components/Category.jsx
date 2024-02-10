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
                setCategory(data);
                // // Check if data is an array before setting state
                // if (Array.isArray(data)) {
                //     setCategory(data);
                // } else {
                //     console.error('Data is not an array:', data);
                // }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }
        fetchData();
    }, [])

    return (
        <>
            <h1>Category List</h1>
            <div className="container">
                {category.map((item) => (
                    <p key={item.id}>Name: {item.title}</p>
                ))}
            </div>
        </>
    )
}
