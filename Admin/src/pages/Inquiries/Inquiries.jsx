import React, { useEffect, useState } from 'react'
import InquiriesDatatable from '../../components/datatable/InquiriesDatatable'
import Navbar from '../../components/navbar/Navbar'
import Sidebar from '../../components/sidebar/Sidebar'
function Inquiries() {
  return (
      <div>
             <div className='list'>
    <Sidebar />
    <div className="listContainer">
      <Navbar />
        <InquiriesDatatable  />
    </div>
  </div>
    </div>
  )
}

export default Inquiries