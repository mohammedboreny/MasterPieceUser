import React, { useEffect, useState } from 'react'
import "./datatable.scss"

import Table  from "@mui/material/Table";
import TableBody from "@mui/material/TableBody";
import TableCell from "@mui/material/TableCell";
import TableContainer from "@mui/material/TableContainer";
import TableHead from "@mui/material/TableHead";
import TableRow from "@mui/material/TableRow";
import Paper from "@mui/material/Paper";
import { userColumns, userRows } from "../../datatablerows"
import { Link } from 'react-router-dom';
import axios from 'axios';
import { TableFooter, TablePagination } from '@mui/material';
const Datatable = (props) => {
  const [rows, setRecords] = useState([]);

  switch (props.type) { 
    case ('records'):
      setRecords(props.data);
      break;
    case ('userRecords'):
      setRecords(props.data);
      break;
    default:
      break;
  }
  const [page, setPage] = React.useState(0);
  const [rowsPerPage, setRowsPerPage] = React.useState(5);
  const handleChangePage = (event, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = (event) => {
    setRowsPerPage(parseInt(event.target.value, 10));
    setPage(0);
  };
      
  return (
    <TableContainer component={Paper} className="table">
      <Table sx={{ minWidth: 650 }} aria-label="simple table">
        <TableHead>
          <TableRow>
            <TableCell className="tableCell">Tracking ID</TableCell>
            <TableCell className="tableCell">Customer ID</TableCell>
            <TableCell className="tableCell">Order Date</TableCell>
            <TableCell className="tableCell">Hours reserved</TableCell>
            <TableCell className="tableCell">Phone_Number</TableCell>
            <TableCell className="tableCell">payment_amount</TableCell>
            <TableCell className="tableCell">Status</TableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {rows.map((row, index, array) => (
            <TableRow key={row.id}>
              <TableCell className="tableCell">{row.id}</TableCell>
              <TableCell className="tableCell">{row.user_id}</TableCell>
              <TableCell className="tableCell">{row.BookingDate}</TableCell>
              <TableCell className="tableCell">{row.Reservation_Time} Hours</TableCell>
              <TableCell className="tableCell">{row.Phone_Number}</TableCell>
              <TableCell className="tableCell">{row.payment_amount} JD</TableCell>
              <TableCell className="tableCell">
                {/* <span className={`status ${row.status}`}>{row.status}</span> */}
              </TableCell>
            </TableRow>
          ))}
        </TableBody>
        <TableFooter>
              <TablePagination
                rowsPerPageOptions={[5, 10, 25, { label: 'All', value: -1 }]}
              colSpan={3}
              count={rows.length}
              rowsPerPage={rowsPerPage}
              page={page}
              SelectProps={{
                inputProps: {
                  'aria-label': 'rows per page',
                },
                native: true,
              }}
              onPageChange={handleChangePage}
              onRowsPerPageChange={handleChangeRowsPerPage}
              />
            </TableFooter>
          </Table>
          </TableContainer>
  )
}

export default Datatable