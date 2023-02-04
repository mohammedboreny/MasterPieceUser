import React, { useEffect, useState } from 'react'
import Datatable2 from '../../components/datatable/Datatable2'
import Navbar from '../../components/navbar/Navbar'
import Sidebar from '../../components/sidebar/Sidebar'
function Inquiries() {
  return (
      <div>
             <div className='list'>
    <Sidebar />
    <div className="listContainer">
      <Navbar />
        <Datatable2  />
    </div>
  </div>
    </div>
  )
}

export default Inquiries