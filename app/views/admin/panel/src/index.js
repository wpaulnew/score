import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import qs from 'qs';
// import './index.css';
// import App from './App';
import registerServiceWorker from './registerServiceWorker';

class MainCantainer extends Component {

    constructor(props) {
        super(props);
        this.state = ({
            request: null,
            clients: []
        });
    }

    handleClick = () => {
        // axios.get('http://192.168.0.89/admin/login')
        //     .then(function (response) {
        //         console.log(response);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });
        axios.post('http://192.168.0.89/admin/login',
            qs.stringify({
                client: 1
            })
        ).then(function (response) {
            console.log(response);
        }).catch(function (error) {
            console.log(error);
        });
    };

    render() {
        return (
            <div>
                Hi, {this.state.request}
                <br/>
                <button onClick={this.handleClick.bind(this)}>Get name</button>
            </div>
        );
    }

}

ReactDOM.render(<MainCantainer/>, document.getElementById('root'));
registerServiceWorker();
