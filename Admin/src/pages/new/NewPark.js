import React, { useEffect } from 'react'
import './new.scss';
import { useState } from 'react';
import Sidebar from '../../components/sidebar/Sidebar';
import Navbar from '../../components/navbar/Navbar';
import axios from 'axios';
import { color } from '@mui/system';
import { DarkModeContext } from '../../context/darkModeContext';
const NewPark = (props) => {
    const [RowInfo, setRecords] = useState([]);
    
    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/getUsers')
            .then(res => {
                console.log(res.data)
                setRecords(res.data);
        
            })
            .catch(err => {
                console.error(err);
            })
    })
    const [name, setName] = useState(RowInfo.name);
    const [street, setStreet] = useState(RowInfo.street);
    const [city, setCity] = useState(RowInfo.city);
    const [email, setEmail] = useState(RowInfo.email);
    const [latitude, setLatitude] = useState(RowInfo.latitude);
    const [longitude, setLongitude] = useState(RowInfo.longitude);
    const [phone, setPhone] = useState(RowInfo.phone);
    const [zip, setZip] = useState(RowInfo.zip);
    const [state, setState] = useState(RowInfo.State);
   

    return (
<div className='single'>
    <Sidebar />
    <div className="singleContainer">
                <Navbar />
                <div className="container">
                            <form className='table' action="">

                                <div className="row g-3 formInput">
                                    <div className="col-sm-6 formInput">
                                        <label style={{color:DarkModeContext?'#FF6F00':'darkgoldenrod'}} for="firstName" >Park Name</label>
                                        <input style={{color:'#FF6F00'}} type="text" name='name' className=" form-control" id="firstName" placeholder="" value={name} onChange={(e)=>setName(e.target.value)} />
                                    </div>

                                    <div className="col-sm-6">
                                        <label for="Street"  style={{color:'#FF6F00'}} className="form-label formInput">Street:</label>
                                        <input type="text"  style={{color:'#FF6F00'}} className="form-control formInput" name='street' id="Street" placeholder="" value={street}
                                            onChange={(e)=>setStreet(e.target.value)} />
                                        <div className="invalid-feedback">
                                            Valid last name is .
                                        </div>
                                    </div>

                                    <div className="col-6">
                                        <label for="latitude"  style={{color:'#FF6F00'}} className="form-label">latitude:</label>
                                        <div className="input-group has-validation">
                                            
                                            <input type="text"  style={{color:'#FF6F00'}} value={latitude} className="form-control" name='latitude' id="" placeholder="latitude"
                                                onChange={(e) =>setLatitude(e.target.value)} />
                                        </div>
                                    </div>
                                    <div className="col-6">
                                        <label for="longitude"  style={{color:'#FF6F00'}} className="form-label">longitude:</label>
                                        <div className="input-group has-validation">
                                            
                                            <input  style={{color:'#FF6F00'}} value={longitude} type="text" className="form-control" name='longitude' id="" placeholder="longitude" onChange={(e)=>setLongitude(e.target.value)} />
                                        </div>
                                    </div>

                                    <div className="col-4">
                                        <label  style={{color:'#FF6F00'}} for="email" className="form-label">state <span className="text-muted"></span></label>
                                        <input  style={{color:'#FF6F00'}} type="text" className="form-control " onChange={(e)=>setState(e.target.value)} name='state' id="email" placeholder="state" value={state} />
                                    </div>


                                    <div className="col-md-5">
                                        <label  style={{color:'#FF6F00'}} for="country" className="form-label">city:</label>
                                        <select  style={{color:'#FF6F00'}} className="form-select" id="country" onChange="">
                                            <option value={city}>Choose...</option>
                                            <option >Amman</option>
                                        </select>
                                        <div className="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                    <div className="col-md-3">
                                        <label  style={{color:'#FF6F00'}} for="zip" className="form-label">Zip</label>
                                        <input  style={{color:'#FF6F00'}} type="text" className="form-control" name='zip' onChange={(e)=>setZip(e.target.value)} value={zip} id="" placeholder=""  />
                                    </div>
                                </div>

                            </form>

                        </div>
            </div>     
            </div> 
)
}
export default NewPark
