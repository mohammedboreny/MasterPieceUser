import React from 'react'
import Navbar from '../../components/navbar/Navbar';
import Sidebar from '../../components/sidebar/Sidebar';
import Widget from '../../components/widget/Widget.jsx';
import Featured from '../../components/featured/Featured.jsx';
import Chart from '../../components/charts/Chart';
import ListTable from '../../components/table/Table.jsx';
import './home.scss';
import { useEffect } from 'react';
import { useState } from 'react';
import { useMemo } from 'react';
import axios from 'axios';
// import { List } from '@mui/material';

const Home = () => {

  const [records, setRecords] = useState();

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

  

  // useMemo(() =>
  // { },
  //   [summary])
  
  return (
    <div className='home'>
      <Sidebar />
      <div className='homeContainer'>
        <Navbar />
        <div className="widgets">
          <Widget type="user"  />
          <Widget type="Parks"  />
          <Widget type="earnings" />
          <Widget type="balance"  />
        </div>
        <div className="charts">
          <Featured/>
          <Chart title="Last 6 months revenue" aspect={ 2/1} />
        </div>
        <div className="listContainer">
          <div className="listTitle">Latest  Records</div>
          <ListTable data={records} type='records'/>
        </div>
      </div>
    </div>
  )
}

export default Home