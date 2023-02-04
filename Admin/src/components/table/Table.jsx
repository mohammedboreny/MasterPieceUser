import "./table.scss";
import Table  from "@mui/material/Table";
import TableBody from "@mui/material/TableBody";
import TableCell from "@mui/material/TableCell";
import TableContainer from "@mui/material/TableContainer";
import TableHead from "@mui/material/TableHead";
import TableRow from "@mui/material/TableRow";
import Paper from "@mui/material/Paper";
import { useEffect, useState } from "react";
import axios from "axios";

const ListTable = (props) => {
  const [rows, setRecords] = useState([]);

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/getBookingsDesc')
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
      </Table>
    </TableContainer>
  );
};

export default ListTable;