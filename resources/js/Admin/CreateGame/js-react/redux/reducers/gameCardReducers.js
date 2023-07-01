import {
    SET_DATE_GAME, SET_LINK_GOOGLE_GAME, SET_LINK_IFRAME_GAME,
    SET_NAME_GAME, SET_TIME_GAME
} from "../store/actionType";

const initialState = {
    nameGame: '',
    dateGame: '',
    timeGame: '',
    linkGoogleGame: '',
    linkIframeGame: '',
}

export function gameCardReducer(state = initialState, action) {
    switch (action.type) {
        case SET_NAME_GAME:
            return {
                ...state,
                nameGame: action.payload
            };
        case SET_DATE_GAME:
            return {
                ...state,
                dateGame: action.payload
            }
        case SET_TIME_GAME:
            return {
                ...state,
                timeGame: action.payload
            }
        case SET_LINK_GOOGLE_GAME:
            return {
                ...state,
                linkGoogleGame: action.payload
            }
        case SET_LINK_IFRAME_GAME:
            return {
                ...state,
                linkIframeGame: action.payload
            }
        default:
            return state;
    }
}
