import './Widget.scss'
import PercentIcon from '@mui/icons-material/Percent';
import { BalanceOutlined, MonetizationOnOutlined, PersonOutline, ShoppingBasket } from '@mui/icons-material';
import { color } from '@mui/system';
import axios from 'axios';

import { useEffect, useState } from 'react';
const Widget = ({ type,Total }) => {
  


  
  let data;

  const amount = 100;
  const diff = 20;

  const [summary, setSummary] = useState([])

  useEffect(() => {
    
  axios.get('http://127.0.0.1:8000/api/getSummary').then((value) => { 
    console.log(value.data);
    setSummary(value.data);
  }).catch((value) => {
    console.log(value);
  }) 
  }, [])


  switch (type) {
    case 'user':
      data = {
        title: "users",
        isMoney: false,
        isTotal: summary.userCount,
        icon: (
          <PersonOutline className="icon" style={{backgroundColor:"rgb(242 23 179 / 20%)"}}  />
        )
      }
      break;
      case 'Parks':
        data = {
          title: "Parks",
          isMoney: false,
          isTotal: summary.countParks,
          icon: (
            <ShoppingBasket className="icon" style={{backgroundColor:"rgba(210 233 21 / 46%)"}}/>
          )
        }
      break;
      case 'balance':
        data = {
          title: "Balance",
          isMoney: false,
          isTotal: summary.countContactUS,
          icon: (
            <BalanceOutlined className="icon" style={{ backgroundColor: "rgb(255 101 11 / 46%)"}}/>
          )
        }
      break;
      case 'earnings':
        data = {
          title: "Earnings",
          isMoney: true,
          isTotal: summary.countTotal,
          icon: (
            <MonetizationOnOutlined className="icon" style={{ backgroundColor: "rgb(23 242 32 / 44%)"}}/>
          )
        }
        break;
    default:
      break;
  }
  return (
      <div className='widget'>
      <div className="left">
        <span className='title'>{data.title}</span>
        <span className='counter'>{data.isMoney && "$"}{data.isTotal }</span>
        <span className='link'>{ data.link}</span>

          </div>
      <div className="right">
        <div className="percentage positive">
          
        </div>
        {data.icon}
          </div>
    </div>
  )
}

export default Widget