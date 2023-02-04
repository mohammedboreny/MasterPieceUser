import React, { useState } from 'react'
import "../datatable/datatable.scss"
function ParksModal(props) {
    const [name, setName] = useState(props.RowInfo.name);
    const [street, setStreet] = useState(props.RowInfo.street);
    const [city, setCity] = useState(props.RowInfo.city);
    const [email, setEmail] = useState(props.RowInfo.email);
    const [latitude, setLatitude] = useState(props.RowInfo.latitude);
    const [longitude, setLongitude] = useState(props.RowInfo.longitude);
    const [phone, setPhone] = useState(props.RowInfo.phone);
    const [zip, setZip] = useState(props.RowInfo.zip);
    const [state, setState] = useState(props.RowInfo.State);
    function showId(id) { 
    console.log(id);
    }

    return (
        <div>

            <button type="button" onClick={ showId(props.id)} className={props.color} data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit
            </button>

            <div className="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="exampleModalLabel">Edit Form with id</h5>
                            <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div className="modal-body">

                            <form action="">

                                <div className="row g-3">
                                    <div className="col-sm-6">
                                        <label for="firstName" className="form-label">Park Name</label>
                                        <input type="text" name='name' className="form-control" id="firstName" placeholder="" value={name} onChange={(e)=>setName(e.target.value)} />
                                    </div>

                                    <div className="col-sm-6">
                                        <label for="Street" className="form-label">Street:</label>
                                        <input type="text" className="form-control" name='street' id="Street" placeholder="" value={street}
                                            onChange={(e)=>setStreet(e.target.value)} />
                                        <div className="invalid-feedback">
                                            Valid last name is .
                                        </div>
                                    </div>

                                    <div className="col-6">
                                        <label for="latitude" className="form-label">latitude:</label>
                                        <div className="input-group has-validation">
                                            
                                            <input type="text" value={latitude} className="form-control" name='latitude' id="" placeholder="latitude"
                                                onChange={(e) =>setLatitude(e.target.value)} />
                                        </div>
                                    </div>
                                    <div className="col-6">
                                        <label for="longitude" className="form-label">longitude:</label>
                                        <div className="input-group has-validation">
                                            
                                            <input value={longitude} type="text" className="form-control" name='longitude' id="" placeholder="longitude" onChange={(e)=>setLongitude(e.target.value)} />
                                        </div>
                                    </div>

                                    <div className="col-12">
                                        <label for="email" className="form-label">state <span className="text-muted"></span></label>
                                        <input type="text" className="form-control" onChange={(e)=>setState(e.target.value)} name='state' id="email" placeholder="state" value={state} />
                                    </div>


                                    <div className="col-md-5">
                                        <label for="country" className="form-label">city:</label>
                                        <select className="form-select" id="country" onChange="">
                                            <option value={city}>Choose...</option>
                                            <option >Amman</option>
                                        </select>
                                        <div className="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                    <div className="col-md-3">
                                        <label for="zip" className="form-label">Zip</label>
                                        <input type="text" className="form-control" name='zip' onChange={(e)=>setZip(e.target.value)} value={zip} id="" placeholder=""  />
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" className="btn btn-primary">Save changes </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    )
}

export default ParksModal