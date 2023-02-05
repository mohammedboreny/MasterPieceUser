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
import TablePaginationActions from './TablePaginationActions';
import { DarkModeContext } from '../../context/darkModeContext';
import { TableFooter, TablePagination } from '@mui/material';

const Datatable2 = (props) => {
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
    
  const [page, setPage] = React.useState(0);
  const [rowsPerPage, setRowsPerPage] = React.useState(5);
  const handleChangePage = (event, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = (event) => {
    setRowsPerPage(parseInt(event.target.value, 10));
    setPage(0);
  };
  const emptyRows =
    page > 0 ? Math.max(0, (1 + page) * rowsPerPage - rows.length) : 0;
    
  return (
    <>
    <h3 className='text-capitalize text-center fst-italic'>Parking Places </h3>

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
        {(rowsPerPage > 0
                ? rows.slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage)
                : rows).map((row) => (
            <TableRow key={row.id}>
              <TableCell className="tableCell">{row.id}</TableCell>
              <TableCell className="tableCell">{row.name}</TableCell>
              <TableCell className="tableCell">{row.street}</TableCell>
              <TableCell className="tableCell">{row.city} </TableCell>
                  <TableCell className="tableCell">{row.phone}</TableCell>
                  <TableCell className='w-25'>
                      <div className=" justify-content-start gap-2 d-flex  align-items-baseline " >
                          <ParksModal key={row.id} color='btn btn-primary' RowInfo={row} id={row.id} />
                          <button className='btn btn-danger ' type='submit' onClick={(e)=>handleDelete(row.id)}>Delete</button>
                          </div>
                  </TableCell>
            </TableRow>
         ))}
                        {emptyRows > 0 && (
                <TableRow style={{ height: 53 * emptyRows }}>
                  <TableCell colSpan={6} />
                </TableRow>
              )}
            </TableBody>
            <TableFooter className='tableCell'>
              <TablePagination
                rowsPerPageOptions={[5, 10, 25, { className: DarkModeContext ? 'tableCell' : 'text-light', label: 'All', value: -1 }]}
                colSpan={3}
                count={rows.length}
                rowsPerPage={rowsPerPage}
                page={page}
                SelectProps={{
                  inputProps: {

                    'aria-label': 'rows per page',
                    'className': ' table datatable datagrid',
                  },
                  native: true,
                }}
                className='tableCell'
                onPageChange={handleChangePage}
                onRowsPerPageChange={handleChangeRowsPerPage}
                ActionsComponent={TablePaginationActions}
              />
            </TableFooter>
          </Table>
        </TableContainer>
        </>  
  )
}

export default Datatable2