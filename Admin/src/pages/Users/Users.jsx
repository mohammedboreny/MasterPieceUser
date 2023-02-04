import React from 'react'
import Datatable3 from '../../components/datatable/Datatable3'
import Navbar from '../../components/navbar/Navbar'
import Sidebar from '../../components/sidebar/Sidebar'

function Users() {
  return (
    <div className='list'>
    <Sidebar />
    <div className="listContainer">
      <Navbar />
      <Datatable3/>
    </div>
  </div>
  )
}

export default Users