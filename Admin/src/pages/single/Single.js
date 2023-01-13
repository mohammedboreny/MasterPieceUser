import React from 'react'
import './Single.scss';
import Chart from '../../components/charts/Chart'
import Sidebar from "../../components/sidebar/Sidebar"
import Navbar from "../../components/navbar/Navbar";
import ListTable from '../../components/table/Table';
const Single = () => {
  return (
    <div className='single'>
      <Sidebar />
      <div className="singleContainer">
        <Navbar />
        <div className="top">
          <div className="left">
            <div className="editButton">Edit</div>
            <div className="title">information</div>
            <div className="item">
              <img src="" alt="" className="itemImg" />
              <div className="details">
                <h1 className="itemTitle">JAne</h1>
                <div className="detailItem">
                  <span className="itemKey">Email:</span>
                  <span className="itemValue">somthing@gmail.com</span>
                </div>
                <div className="detailItem">
                  <span className="itemKey">Phone:</span>
                  <span className="itemValue">123344555</span>
                </div>
                <div className="detailItem">
                  <span className="itemKey">Address:</span>
                  <span className="itemValue">Zarqa</span>
                </div>
                <div className="detailItem">
                  <span className="itemKey">Country:</span>
                  <span className="itemValue">Jordan</span>
                </div>
              </div>
            </div>
          </div>
          <div className="right">
            <Chart aspect={3 /1} title="Spending"/>

          </div>
        </div>
        <div className="bottom">
        <div className="title">Last Transactions</div>

          <ListTable/>
        </div>
      </div>
    </div>
  )
}

export default Single