import "./Sidebar.scss";
// import DashboardIcon from '@mui/icons-material/Dashboard';
import { NavLink } from "react-router-dom";
import { DarkModeContext } from "../../context/darkModeContext";
import { useContext } from "react";
const Sidebar = () => {
    const { dispatch } = useContext(DarkModeContext);

  return (
      <div className="sidebar">
          <div className="top">
              <span className="logo">ParkJo </span>
          </div>
          <hr />
          <div className="center">
              <ul>
                  <p className="title"></p>
                 <NavLink to="/" style={{textDecoration:"none"}}>
                      <li> <span>Dashboard</span></li>
                  </NavLink>
                  <NavLink to="/users" style={{textDecoration:"none"}}>
                      <li><span>Users</span></li>
                  </NavLink>
                  <NavLink to="/Parks" style={{textDecoration:"none"}}>
                      <li><span>Park places</span></li>
                  </NavLink>
                  <NavLink to="/Records" style={{textDecoration:"none"}}>
                      <li><span>Records</span></li>
                  </NavLink>
                  <NavLink to="/Inquiries" style={{textDecoration:"none"}}>
                      <li><span>Inquiries</span></li>
                  </NavLink>
                  <NavLink to="/Reviews" style={{textDecoration:"none"}}>
                      <li><span>Reviews</span></li>
                      </NavLink>
                      <NavLink to="/NewsLetter" style={{textDecoration:"none"}}>
                      <li><span>NewsLetter</span></li>
                  </NavLink>
                 
                  <p className="title">Me</p>
                  <li><span>Log Out</span></li>
              </ul>
          </div>
          <div className="bottom">
              <div className="colorOption"
                  onClick={() => dispatch({ type: "LIGHT" })}></div>
              <div className="colorOption"
                  onClick={() => dispatch({ type: "DARK" })}></div>
          </div>
    </div>
  )
}

export default Sidebar