import React, { useState } from 'react'
import "./datatable.scss"
import { DataGrid } from '@material-ui/data-grid';

import { userColumns, userRows } from "../../datatablerows"
import { Link } from 'react-router-dom';
const Datatable = () => {
  const [data, setData] = useState(userRows);
  const handleDelete = (id) => {
    setData(data.filter((item)=>item.id !== id))
  }
    const actionColumn = [{
      field: "action", headerName: "Action", width: 200,
      renderCell: (params) => {
            return (
              <div className="cellAction">
                <Link to="/users/test" style={{textDecoration:"none"}}>
                  <button className="viewButton">view</button>
                </Link>
                  <button className="deleteButton" onClick={()=>handleDelete(params.row.id)}>Delete</button>
                </div>
            )
        }
    }]
  return (
    <div className='datatable'>
      <div className="dataTableTitle">
      </div>
   
      <DataGrid
        className='datagrid'
        rows={data}
        columns={userColumns.concat(actionColumn)}
                  pageSize={9}
                  rowsPerPageOptions={[9]}
        checkboxSelection
        disableSelectionOnClick
      />
          <Link to="/users/new" className='link'>
     <button className='dataTableButton'> Add New</button>
      </Link>
    </div>
  )
}

export default Datatable