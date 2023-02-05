import React, { useEffect, useState } from 'react'
import "./datatable.scss"
import Table  from "@mui/material/Table";
import TableBody from "@mui/material/TableBody";
import TableCell from "@mui/material/TableCell";
import TableContainer from "@mui/material/TableContainer";
import TableHead from "@mui/material/TableHead";
import TableRow from "@mui/material/TableRow";
import Paper from "@mui/material/Paper";
import axios from 'axios';
import ParksModal from '../Modal/ParksModal';
import Swal from 'sweetalert2';

const InquiriesDatatable = (props) => {
    const [rows, setRecords] = useState([]);

    function handleDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  axios.delete(`http://127.0.0.1:8000/api/deleteContact/${id}`).then((value) => {
                    console.log(value.status);
                  }).catch((error) => {
                    console.error(error);
                  }) 
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
  }
  

  const handlePopUp = (content) => { 
    Swal.fire({
      title: 'Sweet!',
      text: `${content}`,
      imageUrl: 'https://unsplash.it/400/200',
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: 'Custom image',
    })
  }

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/getContact')
    .then(res => {
      console.log(res.data)
      setRecords(res.data);
    
    })
    .catch(err => {
      console.error(err); 
    })
    
  }, [])
    
    
    
  return (
    <div className="container">
      <div className="row mt-3 d-flex align-items-center justify-items-center">
       
      
    <TableContainer  component={Paper} className="table w-50">
      <Table    sx={{ minWidth: 100 }} aria-label="simple  table">
        <TableHead >
          <TableRow >
            <TableCell className="tableCell ">Tracking ID</TableCell>
            <TableCell className="tableCell">email</TableCell>      
          </TableRow>
        </TableHead>
        <TableBody>
          {rows.map((row) => (
            <TableRow key={row.id}>
              <TableCell className="tableCell text-center">{row.id}</TableCell>
            
              <TableCell className="tableCell">{row.email} </TableCell>
           
      
                  
            </TableRow>
          ))}
        </TableBody>
      </Table>
          </TableContainer>
        </div>
        </div>
  )
}

export default InquiriesDatatable