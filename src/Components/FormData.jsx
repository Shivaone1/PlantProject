import React, { useState } from 'react';

const FormDataExample = () => {
  const [formData, setFormData] = useState({
    name: '',
    mobile: '',
    email: '',
    image: null,
  });

  const handleChange = (e) => {
    const { name, value, files } = e.target;

    setFormData((prevData) => ({
      ...prevData,
      [name]: name === 'image' ? files[0] : value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const apiUrl = 'YOUR_API_ENDPOINT'; // Replace with your API endpoint

    const formDataToSend = new FormData();
    formDataToSend.append('name', formData.name);
    formDataToSend.append('mobile', formData.mobile);
    formDataToSend.append('email', formData.email);
    formDataToSend.append('image', formData.image);

    try {
      const response = await fetch(apiUrl, {
        method: 'POST',
        body: formDataToSend,
      });

      if (response.ok) {
        console.log('Form submitted successfully!');
        // You can handle success here, such as redirecting or showing a success message
      } else {
        console.error('Failed to submit form');
        // Handle error, show an error message, etc.
      }
    } catch (error) {
      console.error('Error submitting form:', error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Name:
        <input type="text" name="name" value={formData.name} onChange={handleChange} />
      </label>
      <br />

      <label>
        Mobile:
        <input type="text" name="mobile" value={formData.mobile} onChange={handleChange} />
      </label>
      <br />

      <label>
        Email:
        <input type="text" name="email" value={formData.email} onChange={handleChange} />
      </label>
      <br />

      <label>
        Image:
        <input type="file" name="image" onChange={handleChange} />
      </label>
      <br />

      <button type="submit">Submit</button>
    </form>
  );
};

export default FormDataExample;
