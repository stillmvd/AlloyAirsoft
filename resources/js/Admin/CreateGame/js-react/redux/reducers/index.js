import { combineReducers } from 'redux';
import {
    notSetGameCard,
    setLinkMap,
    setNameGame,
    setTimeGame,
    setDateGame,
    setPolygonGame,
} from './reducers';

const todoApp = combineReducers({
    notSetGameCard,
    setLinkMap,
    setNameGame,
    setTimeGame,
    setDateGame,
    setPolygonGame
});

export default todoApp;
