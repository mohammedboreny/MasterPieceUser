import React, { useEffect, useState } from 'react'
import NewsLetterDataTable from '../../components/datatable/NewsLetterDataTable'
import Navbar from '../../components/navbar/Navbar'
import Sidebar from '../../components/sidebar/Sidebar'

function NewsLetter() {
  return (
      <div>
             <div className='list'>
    <Sidebar />
    <div className="listContainer">
      <Navbar />
        <NewsLetterDataTable  />
    </div>
  </div>

    </div>
  )
}

export default NewsLetter