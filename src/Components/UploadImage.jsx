import React, { useState, useEffect } from 'react';
import axios from 'axios';

export default function UploadImage() {
    const ImageUploadForm = () => {
        const [image, setImage] = useState(null);
        const [successMessage, setSuccessMessage] = useState('');
        const [errorMessage, setErrorMessage] = useState('');
        const [imageList, setImageList] = useState([]);

        const handleImageChange = (event) => {
            const selectedImage = event.target.files[0];
            setImage(selectedImage);
        };
        const handleImageUpload = async () => {
            try {
                const formData = new FormData();
                formData.append('image', image);

                const response = await axios.post('http://127.0.0.1:8000/api/uploadImage', formData);

                setSuccessMessage(response.data.message);
                setErrorMessage('');
                // Assuming you want to fetch the updated image list after a successful upload
                getImageList();
            } catch (error) {
                setErrorMessage('Error uploading image. Please try again.');
                setSuccessMessage('');
            }
        };
        const getImageList = async () => {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/getImage');
                setImageList(response.data); // Assuming your API returns a list of images
            } catch (error) {
                console.error('Error fetching image list:', error);
            }
        };
        // Fetch image list when the component mounts
        useEffect(() => {
            getImageList();
        }, []); // The empty dependency array ensures that this effect runs only once on mount


        return (
            <>
                <div className="container mt-5 text-center">
                    <h2>Image Upload</h2>
                    {successMessage && <div className="alert alert-success">{successMessage}</div>}
                    {errorMessage && <div className="alert alert-danger">{errorMessage}</div>}
                    <div className="form-group">
                        <label htmlFor="image">Choose Image:</label>
                        <input
                            type="file"
                            className="form-control-file form-control"
                            id="image"
                            accept="image/*"
                            onChange={handleImageChange}
                        />
                    </div>
                    <button type="button" className="btn btn-primary" onClick={handleImageUpload}>
                        Upload Image
                    </button>
                </div>

                {/* Display the list of images */}
                <div className='container'>
                    <h2>Image List</h2>
                    <div className="row">
                        {imageList.map((imageItem) => (
                            <div key={imageItem.id}>
                                <div>
                                    <p>{imageItem.name}</p>
                                    <img
                                        className='img_thumbnail p-2'
                                        src={`http://127.0.0.1:8000/images/${imageItem.image}`}
                                        alt={imageItem.name}
                                    />
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </>
        );
    }

    return <ImageUploadForm />;
}
