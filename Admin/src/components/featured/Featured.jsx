import { MoreVert } from '@mui/icons-material'
import { CircularProgressbar } from 'react-circular-progressbar';
import React from 'react';
import "./featured.scss";
import 'react-circular-progressbar/dist/styles.css';
import { useEffect } from 'react';
import { useState } from 'react';
import axios from 'axios';

const Featured = () => {

  const [summary, setSummary] = useState([])
  const [target, setTarget] = useState('');
  
  useEffect(() => {
   
  axios.get('http://127.0.0.1:8000/api/getTotal').then((value) => { 
    console.log("fetured record",value.data);
    setSummary(value.data);
    
    
  }).catch((value) => {
    console.log(value);
  }) 
    
  }, [])

useEffect(() => {
  
  setTarget(Math.round(parseFloat(summary.monthlyTotal) / 2));

}, [summary])

  return (
    <div className='featured'>
      <div className="top">
        <h1 className="title">Total </h1>
        <MoreVert fontSize='small'/>
      </div>
      
      <div className="bottom">
      <span className='title h-3'>Daily Return</span>
        <div className="featuredChart">
         
          <CircularProgressbar value={target} text={`${target}%`} strokeWidth={5} />
<br />
        </div>
        <p className="title">Today Sales</p>
        <p className="amount">{summary.dayTotal?summary.dayTotal:0}$</p>
        <p className="desc">Previous transaction</p>
        <div className="summary">
          <div className="item">
            <div className="itemTitle">Target</div>
            <div className="itemResult">
              <div className="resultAmount">$104k</div>
           
            </div>
          </div>
          <div className="item">
            <div className="itemTitle">Last Weak </div>
            <div className="itemResult ">
              <div className="resultAmount">{summary.weeklyTotal}</div>
            
            </div>
          </div>
          <div className="item">
            <div className="itemTitle">Last Month</div>
            <div className="itemResult">
              <div className="resultAmount">{summary.monthlyTotal}</div>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default Featured