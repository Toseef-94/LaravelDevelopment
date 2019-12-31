import React, { Component } from "react";
import ReactDOM from "react-dom";
import Header from "./Header";
import Sidebar from "./Sidebar";
import Footer from "./Footer";

export default class Index extends Component {
  render() {
    return (
      <div>
        <Header />
        <Sidebar />
        <Footer />
      </div>
    );
  }
}

if (document.getElementById("app")) {
  ReactDOM.render(<Index />, document.getElementById("app"));
}
