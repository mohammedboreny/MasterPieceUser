import './Widget.scss'
import PercentIcon from '@mui/icons-material/Percent';
import { BalanceOutlined, MonetizationOnOutlined, PersonOutline, ShoppingBasket } from '@mui/icons-material';
import { color } from '@mui/system';
const Widget = ({ type }) => {
  let data;

  const amount = 100;
  const diff = 20;

  switch (type) {
    case 'user':
      data = {
        title: "users",
        isMoney: false,
        link: "see all users",
        icon: (
          <PersonOutline className="icon" style={{backgroundColor:"rgb(242 23 179 / 20%)"}}  />
        )
      }
      break;
      case 'Parks':
        data = {
          title: "Parks",
          isMoney: true,
          link: "see all basckets",
          icon: (
            <ShoppingBasket className="icon" style={{backgroundColor:"rgba(210 233 21 / 46%)"}}/>
          )
        }
      break;
      case 'balance':
        data = {
          title: "Balance",
          isMoney: false,
          link: "More Details",
          icon: (
            <BalanceOutlined className="icon" style={{ backgroundColor: "rgb(255 101 11 / 46%)"}}/>
          )
        }
      break;
      case 'earnings':
        data = {
          title: "Earnings",
          isMoney: false,
          link: "View net earning ",
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
        <span className='counter'>{data.isMoney && "$"}{amount }</span>
        <span className='link'>{ data.link}</span>

          </div>
      <div className="right">
        <div className="percentage positive">
          {diff} <PercentIcon />
        </div>
        {data.icon}
          </div>
    </div>
  )
}

export default Widget