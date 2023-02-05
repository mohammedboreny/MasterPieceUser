import Home from "./pages/home/Home";
import Login from "./pages/login/Login";
import New from "./pages/new/New";
import Single from "./pages/single/Single";
import {
  BrowserRouter as Router,
  Routes,
  Route
}
  from "react-router-dom";
  import "./style/dark.scss"
import { productInputs, userInputs } from "./formSource";
import { useContext } from 'react';
import { DarkModeContext } from './context/darkModeContext';
import Records from "./pages/records/Records";
import Parkplaces from "./pages/Park/Parkplaces";
import Inquiries from "./pages/Inquiries/Inquiries";
import NewsLetter from "./pages/NewsLetter/NewsLetter";
import Reviews from "./pages/Reviews/Reviews";
import Users from "./pages/Users/Users";
import NewPark from "./pages/new/NewPark";
function App() {
  const { darkMode } = useContext(DarkModeContext);
  return (
    <div className={darkMode?"app dark":"app"}>
      <Router>
        <Routes>
       
            <Route path="/" >
            <Route index element={<Home />} />
            <Route path="Login" element={<Login/>} />
          </Route>
          <Route path="users">
            <Route index element={<Users />} />
            <Route path=":userId" element={<Single />} />
          </Route>
          <Route path="Records">
            <Route index element={<Records />} />
          </Route>
          <Route path="Parks">
            <Route index element={<Parkplaces />} />
          </Route>
          <Route exact  path="EditParks/:id" element={ <NewPark />}/>


          <Route path="Inquiries">
            <Route index element={<Inquiries />} />
          </Route>
          <Route path="Reviews">
            <Route index element={<Reviews />} />
          </Route>
          <Route path="NewsLetter">
            <Route index element={<NewsLetter />} />
          </Route>
        </Routes>
        
      </Router>
    </div>
  );
}

export default App;
