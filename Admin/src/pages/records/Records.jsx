import React from 'react'
import Navbar from '../../components/navbar/Navbar'
import Sidebar from '../../components/sidebar/Sidebar'

function Records() {
  return (
    <div className='list'>
    <Sidebar />
    <div className="listContainer">
      <Navbar />
      {/* <Datatable/> */}
    </div>
  </div>
  )
}

export default Records