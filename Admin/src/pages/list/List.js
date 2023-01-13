import React from 'react'
import './List.scss';
import Sidebar from '../../components/sidebar/Sidebar.jsx';
import Navbar from '../../components/navbar/Navbar.jsx';
import Datatable from '../../components/datatable/Datatable';
const List = () => {
  return (
    <>
    <div className='list'>
        <Sidebar />
        <div className="listContainer">
          <Navbar />
          <Datatable/>
        </div>
      </div>
      </>
  )
}

export default List