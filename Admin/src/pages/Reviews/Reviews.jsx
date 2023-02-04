import React, { useEffect, useState } from 'react'
import ReviewsDataTable from '../../components/datatable/ReviewsDataTable'
import Navbar from '../../components/navbar/Navbar'
import Sidebar from '../../components/sidebar/Sidebar'

function Reviews() {
  return (
      <div>
             <div className='list'>
    <Sidebar />
    <div className="listContainer">
      <Navbar />
        <ReviewsDataTable  />
    </div>
  </div>
    </div>
  )
}

export default Reviews