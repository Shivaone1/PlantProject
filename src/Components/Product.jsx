import React, { useState } from 'react';

const Product = () => {
    const [formData, setFormData] = useState({
        plant_id: '',
        section_id: '',
        subsection_id: '',
        equipment_id: '',
        category_id: '',
        subcategory_id: '',
        description: '',
        equipment: '',
        version: '',
        checksheettype: '',
        create_by: '',
        // checkpoints: [],
        // spareParts: [],
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((formData) => ({ ...formData, [name]: value }));
    };

    const handleCheckpointChange = (index, field, value) => {
        const updatedCheckpoints = [...formData.checkpoints];
        updatedCheckpoints[index] = {
            ...updatedCheckpoints[index],
            [field]: value,
        };
        setFormData((prevData) => ({ ...prevData, checkpoints: updatedCheckpoints }));
    };

    const handleSparePartChange = (index, field, value) => {
        const updatedSpareParts = [...formData.spareParts];
        updatedSpareParts[index] = {
            ...updatedSpareParts[index],
            [field]: value,
        };
        setFormData((prevData) => ({ ...prevData, spareParts: updatedSpareParts }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const formDataObj = new FormData();

            for (const key in formData) {
                if (key === 'checkpoints' || key === 'spareParts') {
                    formData[key].forEach((item, index) => {
                        for (const field in item) {
                            if (field === 'media') {
                                formDataObj.append(`${key}[${index}].${field}`, item[field]);
                            } else {
                                formDataObj.append(`${key}[${index}].${field}`, item[field]);
                            }
                        }
                    });
                } else {
                    formDataObj.append(key, formData[key]);
                }
            }

            const response = await fetch('http://127.0.0.1:8000/api/productObject/', {
                method: 'POST',
                body: formDataObj,
            });


            if (response.ok) {
                console.log('Form submitted successfully');
                // Reset the form or perform any other actions
            } else {
                const data = await response.json();
                console.error('Form submission failed:', data.message);
            }
        } catch (error) {
            console.error('Error during form submission:', error.message);
        }
    };


    return (
        <>
            <div className="container mt-5">
                <form onSubmit={handleSubmit}>
                    <div className="row">
                        <div className="form-group col-md-6">
                            <label for="plant_id">Plant ID</label>
                            <input type="text" className="form-control" id="plant_id" name="plant_id" value={formData.plant_id} onChange={handleChange} placeholder="Plant ID" />
                        </div>
                        <div className="form-group col-md-6">
                            <label for="section_id">Section ID</label>
                            <input type="text" className="form-control" id="section_id" name="section_id" value={formData.section_id} onChange={handleChange} placeholder="Section ID" />
                        </div>
                    </div>
                    <div className="row">
                        <div className="form-group col-md-6">
                            <label for="subsection_id">Sub Section ID</label>
                            <input type="text" className="form-control" id="subsection_id" name="subsection_id" value={formData.subsection_id} onChange={handleChange} placeholder="subsection_id" />
                        </div>
                        <div className="form-group col-md-6">
                            <label for="equipment_id">Equipment ID</label>
                            <input type="text" className="form-control" id="equipment_id" name="equipment_id" value={formData.equipment_id} onChange={handleChange} placeholder="equipment_id" />
                        </div>
                    </div>

                    <div className="row">
                        <div className="form-group col-md-6">
                            <label for="category_id">Category ID</label>
                            <input type="text" className="form-control" id="category_id" name="category_id" value={formData.category_id} onChange={handleChange} placeholder="category_id" />
                        </div>
                        <div className="form-group col-md-6">
                            <label for="subcategory_id">Sub-Category ID</label>
                            <input type="text" className="form-control" id="subcategory_id" name="subcategory_id" value={formData.subcategory_id} onChange={handleChange} placeholder="subcategory_id" />
                        </div>
                    </div>
                    <div className="row">
                        <div className="form-group col-md-6">
                            <label for="description">Description</label>
                            <input type="text" className="form-control" id="description" name="description" value={formData.description} onChange={handleChange} placeholder="description" />
                        </div>
                        <div className="form-group col-md-6">
                            <label for="equipment">Equipment</label>
                            <input type="text" className="form-control" id="equipment" name="equipment" value={formData.equipment} onChange={handleChange} placeholder="equipment" />
                        </div>
                    </div>
                    <div className="row">
                        <div className="form-group col-md-6">
                            <label for="version">Version</label>
                            <input type="text" className="form-control" id="version" name="version" value={formData.version} onChange={handleChange} placeholder="version" />
                        </div>
                        <div className="form-group col-md-6">
                            <label for="checksheettype">Checksheet Type</label>
                            <input type="text" className="form-control" id="checksheettype" name="checksheettype" value={formData.checksheettype} onChange={handleChange} placeholder="checksheettype" />
                        </div>
                    </div>
                    <div className="row">
                        <div className="form-group col-md-12">
                            <label for="create_by">Created By</label>
                            <input type="text" className="form-control" id="create_by" name="create_by" value={formData.create_by} onChange={handleChange} placeholder="create_by" />
                        </div>
                    </div>

                    {/* {formData.checkpoints.map((checkpoint, index) => (
                        <div key={index} className='d-flex'>
                            <input className="m-1" type="text" name={`checkpoints[${index}].title`} value={checkpoint.title || ''} onChange={(e) => handleCheckpointChange(index, 'title', e.target.value)} placeholder="Checkpoint Title"/>
                            <input className="m-1" type="text" name={`checkpoints[${index}].std_value`} value={checkpoint.std_value || ''} onChange={(e) => handleCheckpointChange(index, 'std_value', e.target.value)} placeholder="Standard Value" />
                            <input className="m-1" type="text" name={`checkpoints[${index}].check_method`} value={checkpoint.check_method || ''} onChange={(e) => handleCheckpointChange(index, 'check_method', e.target.value)} placeholder="Check Method"  />
                            <input className="m-1" type="text" name={`checkpoints[${index}].actual_value`} value={checkpoint.actual_value || ''} onChange={(e) => handleCheckpointChange(index, 'actual_value', e.target.value)}  placeholder="Actual Value"  />
                            <input className="m-1" type="text" name={`checkpoints[${index}].remark`} value={checkpoint.remark || ''} onChange={(e) => handleCheckpointChange(index, 'remark', e.target.value)} placeholder="Remark" />
                            <input className="m-1" type="file" name={`checkpoints[${index}].media`} onChange={(e) => handleCheckpointChange(index, 'media', e.target.files[0])}accept="image/*" />
                        </div>
                    ))} */}

                    {/* {formData.spareParts.map((sparePart, index) => (
                        <div key={index} className='d-flex'>
                            <input className="m-1" type="text" name={`spareParts[${index}].spare_part`} value={sparePart.spare_part || ''} onChange={(e) => handleSparePartChange(index, 'spare_part', e.target.value)} placeholder="Spare Part" />
                            <input className="m-1" type="text" name={`spareParts[${index}].descriotion`} value={sparePart.descriotion || ''} onChange={(e) => handleSparePartChange(index, 'descriotion', e.target.value)} placeholder="descriotion" />
                            <input className="m-1" type="text" name={`spareParts[${index}].qty`} value={sparePart.qty || ''} onChange={(e) => handleSparePartChange(index, 'qty', e.target.value)} placeholder="Qty" />
                            <input className="m-1"type="text" name={`spareParts[${index}].reason`} value={sparePart.reason || ''} onChange={(e) => handleSparePartChange(index, 'reason', e.target.value)} placeholder="reason" />
                            <input className="m-1" type="text" name={`spareParts[${index}].remark`} value={sparePart.remark || ''} onChange={(e) => handleSparePartChange(index, 'remark', e.target.value)} placeholder="remark" />
                            <input className="m-1" type="file" name={`spareParts[${index}].media`} onChange={(e) => handleSparePartChange(index, 'media', e.target.files[0])} accept="image/*" />
                        </div>
                    ))} */}
                    <button type="submit" className="form-control bg-success text-light mt-3 mb-5">Submit</button>
                </form>
            </div>
        </>
    );
};

export default Product;
