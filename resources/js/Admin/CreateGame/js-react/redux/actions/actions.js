import {
    SET_DATE_GAME,
    SET_LINK_MAP, SET_NAME_GAME, SET_POLYGON_GAME, SET_TIME_GAME
} from '../store/actionType'

/*
 * генераторы экшенов
 */
export const setMapGameWithLink = (link) => ({
    type: SET_LINK_MAP,
    payload: link
});

export const setNameGame = (name) => ({
    type: SET_NAME_GAME,
    payload: name
});

export const setDateGame = (date) => ({
    type: SET_DATE_GAME,
    payload: date
});

export const setTimeGame = (time) => ({
    type: SET_TIME_GAME,
    payload: time
});

export const setPolygon = (polygon) => ({
    type: SET_POLYGON_GAME,
    payload: polygon
});



