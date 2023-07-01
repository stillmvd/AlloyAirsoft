import { combineReducers } from 'redux';
import {gameCardReducer} from "./gameCardReducers";
import {pricesReducer} from "./pricesReducers";
import {rulesReducer} from "./rulesReducers";
import {infoReducer} from "./infoReducer";

const createGameReducers = combineReducers({
    gameCard: gameCardReducer,
    prices: pricesReducer,
    info: infoReducer,
    rules: rulesReducer,
});

export default createGameReducers;
