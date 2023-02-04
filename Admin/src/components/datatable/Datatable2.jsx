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

const Datatable2 = (props) => {
    const [rows, setRecords] = useState([]);


  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/getParkings')
    .then(res => {
      console.log(res.data)
      setRecords(res.data);
    
    })
    .catch(err => {
      console.error(err); 
    })
    
       },[])
  return (
    <TableContainer component={Paper} className="table">
      <Table sx={{ minWidth: 650 }} aria-label="simple table">
        <TableHead>
          <TableRow>
            <TableCell className="tableCell">Tracking ID</TableCell>
            <TableCell className="tableCell">name</TableCell>
            <TableCell className="tableCell">street</TableCell>
            <TableCell className="tableCell">city</TableCell>
                      <TableCell className="tableCell">Phone_Number</TableCell>
                      <TableCell className="tableCell">More</TableCell>
     
          </TableRow>
        </TableHead>
        <TableBody>
          {rows.map((row, index, array) => (
            <TableRow key={row.id}>
              <TableCell className="tableCell">{row.id}</TableCell>
              <TableCell className="tableCell">{row.name}</TableCell>
              <TableCell className="tableCell">{row.street}</TableCell>
              <TableCell className="tableCell">{row.city} Hours</TableCell>
                  <TableCell className="tableCell">{row.phone}</TableCell>
                  <TableCell className="tableCell"><ParksModal/> </TableCell>
            </TableRow>
          ))}
        </TableBody>
      </Table>
    </TableContainer>
  )
}

export default Datatable2