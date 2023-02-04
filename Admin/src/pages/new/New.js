import React from 'react'
import './new.scss';
import { useState } from 'react';
import Sidebar from '../../components/sidebar/Sidebar';
import Navbar from '../../components/navbar/Navbar';
import { DriveFolderUploadRounded }  from '@mui/icons-material';
const New = ({ inputs, title }) => {
  
  const [ file, setFile ] = useState("");
  console.log(file);
  return (
    <div className='new'>
    <Sidebar/>
    <div className="newContainer">
        <Navbar />
        <div className="top">
          <h1>add new user</h1>
        </div>
        <div className="bottom">
          <div className="left">
            <img src={file? URL.createObjectURL(file):"https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM="}
             alt=""
              srcset="" />
          </div>
          <div className="right">
            <form action="">
              <div className="formInput">
              <label > UserName</label>
                <input type="text" placeholder='xxxx' />
              </div>
              <div className="formInput">
              <label > Name</label>
                <input type="text" placeholder='xxxx' />
              </div>
              <div className="formInput">
              <label > Email</label>
                <input type="email" placeholder='xxxx@gmail' />
              </div>
              <div className="formInput">
              <label > Phone:</label>
                <input type="text" placeholder='+962' />
              </div>
              <div className="formInput">
              <label > Address:</label>
                <input type="text" placeholder='Zarqa' />
              </div>
              <div className="formInput">
              <label > Country:</label>
                <input type="text" placeholder='Zarqa' />
              </div>
              <div className="formInput">
                <label htmlFor='file' >
                  image: <DriveFolderUploadRounded
                 className='icon' />
                </label>
                <input type="file" id='file'
                  onChange={(e) => setFile(e.target.files[0])}
                  style={{ display: "none" }} />
              </div>
              {/* {inputs.map((input) => {
                       <div className="formInput" key={input.id}>
                         <label > {input.label}</label>
                         <input type={input.type} placeholder={input.placeholder} />
                       </div>

                })} */}
              <button>Edit</button>
          </form>
          </div>
        </div>
    </div>
    </div>
      
  )
}

export default New