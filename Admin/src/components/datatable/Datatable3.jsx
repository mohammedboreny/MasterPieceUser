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
import Swal from 'sweetalert2';

const Datatable3 = (props) => {
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
                axios.delete(`http://127.0.0.1:8000/api/deleteUser/${id}`).then((value) => {
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

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/getUsers')
    .then(res => {
      console.log(res.data)
      setRecords(res.data);
    
    })
    .catch(err => {
      console.error(err); 
    })
    
       },[])
  return (
    <>
    <h3 className='text-center'>Users Section</h3>
    < TableContainer component={Paper} className="table">
      <Table sx={{ minWidth: 650 }} aria-label="simple table">
        <TableHead>
          <TableRow>
            <TableCell className="tableCell">Tracking ID</TableCell>
            <TableCell className="tableCell">name</TableCell>
            <TableCell className="tableCell">email</TableCell>
            <TableCell className="tableCell">phone_number</TableCell>
            <TableCell className="tableCell">auth_type</TableCell>
     
          </TableRow>
        </TableHead>
        <TableBody>
          {rows.map((row) => (
            <TableRow key={row.id}>
              <TableCell className="tableCell">{row.id}</TableCell>
              <TableCell className="tableCell">
                {
                row.firstName?
                row.firstName+row.lastName 
                :
                row.fullName }
              </TableCell>
              <TableCell className="tableCell">{row.email}</TableCell>
              <TableCell className="tableCell">{row.phone_number} </TableCell>
              <TableCell className="tableCell">{row.auth_type}</TableCell>
              <TableCell className='w-25'>
                      <div className=" justify-content-start gap-2 d-flex  align-items-baseline " >
                          {/* <ParksModal key={row.id} color='btn btn-primary' RowInfo={row} id={row.id} /> */}
                          <button className='btn btn-danger ' type='submit' onClick={(e)=>handleDelete(row.id)}>Delete</button>
                          </div>
                  </TableCell>
            </TableRow>
          ))}
        </TableBody>
      </Table>
      </TableContainer>
      </>
      )
     
}

export default Datatable3