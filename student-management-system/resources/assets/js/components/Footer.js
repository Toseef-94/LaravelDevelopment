import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Header extends Component {
  render() {
    return (
      <footer className="main-footer">
        <strong>
          Copyright © 2014-2019{"{"}" "{"}"}
          <a href="http://adminlte.io">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <div className="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.1
        </div>
      </footer>
    );
  }
}
