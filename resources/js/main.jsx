import "./bootstrap";
import "../css/app.css";
import ReactDOM from "react-dom/client";
import App from "./App";
import { BrowserRouter } from "react-router-dom";

ReactDOM.createRoot(document.getElementById("main")).render(
    <BrowserRouter>
        <App />
    </BrowserRouter>
);
