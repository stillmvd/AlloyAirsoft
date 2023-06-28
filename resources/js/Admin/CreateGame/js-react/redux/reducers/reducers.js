import {
    NOT_SET_GAME_CARD,
    SET_GAME_CARD,
    SET_LINK_MAP, SET_POLYGON_GAME, SET_TIME_GAME
} from '../store/actionType'

const initialState = {
    isSet: false
};

export function notSetGameCard(state = initialState, action) {
    switch (action.type) {
        case NOT_SET_GAME_CARD:
            return true;
        case SET_GAME_CARD:
            return false
        default:
            return state;
    }
}

export function setLinkMap(state = {}, action) {
    switch (action.type) {
        case SET_LINK_MAP:
            return action.payload;
        default:
            return state;
    }
}

export function setNameGame(state = {}, action) {
    switch (action.type) {
        case SET_GAME_CARD:
            return action.payload;
        default:
            return state;
    }
}

export function setTimeGame(state = {}, action) {
    switch (action.type) {
        case SET_TIME_GAME:
            return action.payload;
        default:
            return state;
    }
}

export function setDateGame(state = {}, action) {
    switch (action.type) {
        case SET_GAME_CARD:
            return action.payload;
        default:
            return state;
    }
}

export function setPolygonGame(state = {}, action) {
    switch (action.type) {
        case SET_POLYGON_GAME:
            return action.payload;
        default:
            return state;
    }
}
