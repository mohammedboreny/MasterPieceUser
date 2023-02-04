import './chart.scss';
import { BarChart,Legend,Bar, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer } from 'recharts';

const data = [
  { name: "JAN", total: 1200 },
  { name: "FEB", total: 100 },
  { name: "MAR", total: 1200 },
  { name: "APRL", total: 2000 },
  { name: "MAY", total: 3000 },
  { name: "JUN", total: 1200 }
];
 
const Chart = ({ aspect, title }) => {
 
  return (
    <div className='chart'>
      <div className="title">{title}</div>
      <ResponsiveContainer width="100%" aspect={aspect} >
      <BarChart width={300} height={250} data={data}>
  <CartesianGrid strokeDasharray="2 2" className='chartGrid' />
  <XAxis dataKey="name" />
  <YAxis />
  <Tooltip />
  <Legend />
  <Bar dataKey="total" fill="#ff5349" />
</BarChart>
        </ResponsiveContainer>
    </div>
  )
}

export default Chart