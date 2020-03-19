import React, { Component } from 'react'
import ReactDOM from 'react-dom';

class Main extends Component {
    render() {
        return (
            <div>
                 <div className="container">
                     <div className="row justify-content-center">
                         <div className="col-md-8">
                             <div className="card">
                                 <div className="card-header"><p>Example Component</p></div>

                                 <div className="card-body"><p>I'm an example component!</p></div>
                             </div>
                         </div>
                     </div>
                </div>
            hello
            </div>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<Main />, document.getElementById('app'));
}else{
    console.log("nope");
    
}
