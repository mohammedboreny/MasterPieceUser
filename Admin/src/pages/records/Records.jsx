import React from 'react'
import RecordsDatatable from '../../components/datatable/RecordsDatatable'
import Navbar from '../../components/navbar/Navbar'
import Sidebar from '../../components/sidebar/Sidebar'

function Records() {
  return (
    <div className='list'>
    <Sidebar />
    <div className="listContainer">
      <Navbar />
      <RecordsDatatable/>
    </div>
  </div>
  )
}

export default Records