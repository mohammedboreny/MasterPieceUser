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

const RecordsDatatable = (props) => {
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
                  axios.delete(`http://127.0.0.1:8000/api/deleteParkings/${id}`).then((value) => {
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
    axios.get('http://127.0.0.1:8000/api/getParkings')
    .then(res => {
      console.log(res.data)
      setRecords(res.data);
    
    })
    .catch(err => {
      console.error(err); 
    })
    
  }, [])
    
    
    
  return (
    <TableContainer component={Paper} className="table">
      <Table sx={{ minWidth: 650 }} aria-label="simple table">
        <TableHead>
          <TableRow>
            <TableCell className="tableCell">Tracking ID</TableCell>
            <TableCell className="tableCell">name</TableCell>
            <TableCell className="tableCell">street</TableCell>
            <TableCell className="tableCell">city</TableCell>
                      <TableCell className="tableCell">Park Contact</TableCell>
                      <TableCell className="tableCell">More</TableCell>
     
          </TableRow>
        </TableHead>
        <TableBody>
          {rows.map((row) => (
            <TableRow key={row.id}>
              <TableCell className="tableCell">{row.id}</TableCell>
              <TableCell className="tableCell">{row.name}</TableCell>
              <TableCell className="tableCell">{row.street}</TableCell>
              <TableCell className="tableCell">{row.city} Hours</TableCell>
                  <TableCell className="tableCell">{row.phone}</TableCell>
                  <TableCell className='w-25'>
                      <div className=" justify-content-start gap-2 d-flex  align-items-baseline " >
                          <ParksModal key={row.id} color='btn btn-primary' RowInfo={row} id={row.id} />
                          <button className='btn btn-danger ' type='submit' onClick={(e)=>handleDelete(row.id)}>Delete</button>
                          </div>
                  </TableCell>
            </TableRow>
          ))}
        </TableBody>
      </Table>
    </TableContainer>
  )
}

export default RecordsDatatable