import { KeyboardAltTwoTone, KeyboardArrowDown, MoreVert } from '@mui/icons-material'
import { CircularProgressbar } from 'react-circular-progressbar';
import React from 'react';
import "./featured.scss";
import 'react-circular-progressbar/dist/styles.css';
const Featured = () => {
  return (
    <div className='featured'>
      <div className="top">
        <h1 className="title">Total </h1>
        <MoreVert fontSize='small'/>
      </div>
      <div className="bottom">
        <div className="featuredChart">
          <CircularProgressbar value={70} text={`$ {70}%`} strokeWidth={5} />

        </div>
        <p className="title">Total Sales</p>
        <p className="amount">$430</p>
        <p className="desc">Previous transaction</p>
        <div className="summary">
          <div className="item">
            <div className="itemTitle">Target</div>
            <div className="itemResult">
              <div className="resultAmount">$12.4k</div>
              <KeyboardArrowDown fontSize='small'/>
            </div>
          </div>
          <div className="item">
            <div className="itemTitle">Last Weak </div>
            <div className="itemResult negative">
              <div className="resultAmount">$12.4k</div>
              <KeyboardArrowDown fontSize='small'/>
            </div>
          </div>
          <div className="item">
            <div className="itemTitle">Last Month</div>
            <div className="itemResult positive">
              <div className="resultAmount">$12.4k</div>
              <KeyboardArrowDown fontSize='small'/>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default Featured