import React from "react";
import ReactDOM from 'react-dom';
import MainComponent from './Components/MainComponent';
import { Provider } from "react-redux";
import {createStore} from "redux";
import todoApp from "./redux/reducers";

const element = document.getElementById('game-card')

ReactDOM.render(
    <Provider store={createStore(
        todoApp,
        window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
    )}>
        <MainComponent />
    </Provider>,
    element
)
