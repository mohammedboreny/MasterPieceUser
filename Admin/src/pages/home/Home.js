import React from 'react'
import Navbar from '../../components/navbar/Navbar';
import Sidebar from '../../components/sidebar/Sidebar';
import Widget from '../../components/widget/Widget.jsx';
import Featured from '../../components/featured/Featured.jsx';
import Chart from '../../components/charts/Chart';
import ListTable from '../../components/table/Table.jsx';
import './home.scss';
// import { List } from '@mui/material';

const Home = () => {
  return (
    <div className='home'>
      <Sidebar />
      <div className='homeContainer'>
        <Navbar />
        <div className="widgets">
          <Widget type="user" />
          <Widget type="Parks"/>
          <Widget type="earnings"/>
          <Widget type="balance"/>
        </div>
        <div className="charts">
          <Featured/>
          <Chart title="Last 6 months revenue" aspect={ 2/1} />
        </div>
        <div className="listContainer">
          <div className="listTitle">Latest  Records</div>
          <ListTable/>
        </div>
      </div>
    </div>
  )
}

export default Home