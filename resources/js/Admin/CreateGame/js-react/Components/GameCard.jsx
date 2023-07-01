import React from "react";
import {Button, Card, Countdown, Input} from "react-daisyui";
import dayjs from "dayjs";

export default class GameCard extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            setName: false,
            setDate: false,
            setTime: false,
            setLinkGoogleGame: false,
            setLinkIframeGame: false,
        }

        //bind clicks
        this.nameGameClick = this.nameGameClick.bind(this);
        this.dateGameClick = this.dateGameClick.bind(this);
        this.timeGameClick = this.timeGameClick.bind(this);
        this.setGameMap = this.setGameMap.bind(this);

        //bind inputs
        this.handleInputNameGame = this.handleInputNameGame.bind(this);
        this.handleInputDateGame = this.handleInputDateGame.bind(this);
        this.handleInputTimeGame = this.handleInputTimeGame.bind(this);
        this.handleInputLinkGoogleGame = this.handleInputLinkGoogleGame.bind(this);
        this.handleInputLinkIframeGame = this.handleInputLinkIframeGame.bind(this);
    }


    //Click for view result
    //to do переписать чезер switch case
    nameGameClick() {
        this.setState({ setName: !this.setName })
    }

    dateGameClick() {
        this.setState({ setDate: !this.setDate })
    }

    timeGameClick() {
        this.setState( {setTime: !this.setTime })
    }

    setGameMap() {
        this.setState( {
            setLinkGoogleGame: !this.setLinkGoogleGame,
            setLinkIframeGame: !this.setLinkIframeGame,
        });
    }


    //to do переписать чезер switch case
    //handle Input
    handleInputNameGame(e) {
        const value = e.target.value;
        this.props.setNameGame(value);
    }

    handleInputDateGame(e) {
        const value = e.target.value;
        this.props.setDateGame(value);
    }

    handleInputTimeGame(e) {
        const value = e.target.value;
        this.props.setTimeGame(value);
    }

    handleInputLinkGoogleGame(e) {
        const value = e.target.value;
        this.props.setLinkGoogleGame(value);
    }

    handleInputLinkIframeGame(e) {
        const value = e.target.value;
        this.props.setLinkIframeGame(value);
    }



    render() {
        const capitalize = str => str.charAt(0).toUpperCase() + str.slice(1);

        const args = {}
        const {
            nameGame,
            dateGame,
            timeGame,
            linkGoogleGame,
            linkIframeGame } = this.props;

        const {
            setName,
            setDate,
            setTime,
            setLinkGoogleGame,
            setLinkIframeGame,
        } = this.state;

        const date = new Date(dateGame);
        const dayGame = dayjs(date).format("D");
        const mounthGame = dayjs(date).format("MMM");

        const afternoon = capitalize(dayjs(String(  '01.07.2023 ' + timeGame)).format("a"));

        return (
            <div className="w-full rounded-xl bg-card_bg/75">
                <Card >
                    <Card.Body>
                        <h3 className="text-center">Fill in the data to display the card with the game</h3>
                        <div className="w-full grid gap-6 grid-cols-1 grid-rows-3 gap-y-6
                                        sm:grid-cols-2 sm:grid-rows-2
                                        lg:grid-cols-3 lg:grid-rows-1 py-9">
                            {
                                !setName
                                    ?   <div className={"w-1/4 flex justify-center items-center gap-4"}>
                                            <Input {...args} value={nameGame}
                                                   onInput={this.handleInputNameGame} name={"nameGame"}
                                                   placeholder={"Name Game"}/>
                                            <Button {...args}
                                                    size={"sm"}
                                                    color={"info"}
                                                    children={"~"}
                                                    animation={true}
                                                    shape={"circle"}
                                                    className={"flex justify-center items-center"}
                                                    onClick={this.nameGameClick}/>
                                        </div>

                                    :   <b className="text-5xl font-normal self-center lg:self-end place-self-center
                                            lg:place-self-start sm:col-span-2 lg:col-span-1">
                                            {nameGame}
                                        </b>
                            }
                            {
                                !setDate
                                    ?   <div className={"w-1/4 flex justify-center items-center gap-4"}>
                                            <Input {...args} value={dateGame}
                                                   onInput={this.handleInputDateGame} name={"dateGame"}
                                                   placeholder={"Date Game"} type={"date"}/>
                                            <Button {...args}
                                                    size={"sm"}
                                                    color={"info"}
                                                    children={"~"}
                                                    animation={true}
                                                    shape={"circle"}
                                                    className={"flex justify-center items-center"}
                                                    onClick={this.dateGameClick}/>
                                        </div>

                                    :   <div className="w-full lg:w-min flex flex-row bg-card_bg lg:bg-transparent
                                                rounded-2xl py-6 lg:py-0 items-end justify-center
                                                lg:justify-end lg:place-self-center">
                                            <b className="text-5xl select-none mr-3 font-normal">
                                                { dayGame }
                                            </b>
                                            <p className="leading-6 select-none">
                                                { mounthGame }
                                            </p>
                                        </div>
                            }
                            {
                                !setTime
                                    ?   <div className={"w-1/4 flex justify-center items-center gap-4"}>
                                            <Input {...args} value={timeGame}
                                                   onInput={this.handleInputTimeGame} name={"timeGame"}
                                                   placeholder={"Date Game"} type={"time"}/>
                                            <Button {...args}
                                                    size={"sm"}
                                                    color={"info"}
                                                    children={"~"}
                                                    animation={true}
                                                    shape={"circle"}
                                                    className={"flex justify-center items-center"}
                                                    onClick={this.timeGameClick}/>
                                        </div>

                                    :   <div
                                            className="w-full lg:w-min bg-card_bg lg:bg-transparent rounded-2xl py-6
                                            lg:py-0 justify-center lg:justify-end flex flex-row items-end place-self-end">
                                                <b className="text-5xl select-none mr-3 font-normal">
                                                    {timeGame}
                                                </b>
                                                <p className="leading-6 select-none">
                                                    {afternoon}
                                                </p>
                                        </div>
                            }
                        </div>
                        {
                            (!setLinkGoogleGame && !setLinkIframeGame)
                                ?   <div className="flex w-full component-preview p-4 items-center justify-center gap-4 font-sans flex-col">
                                        <Input {...args} value={linkGoogleGame}
                                               onInput={this.handleInputLinkGoogleGame} name={"linkGoogleGame"}
                                               placeholder={"Link Google Game"} />
                                        <Input {...args} value={linkIframeGame}
                                               onInput={this.handleInputLinkIframeGame} name={"linkIframeGame"}
                                               placeholder={"Link Iframe Game"}/>
                                        <Button {...args}
                                                size={"lg"}
                                                color={"info"}
                                                children={"SET MAP"}
                                                animation={true}
                                                shape={"square"}
                                                className={"flex justify-center items-center"}
                                                onClick={this.setGameMap}/>
                                    </div>
                                :   <div className="h-[500px] lg:h-[300px] w-full flex justify-between relative group
                                        ring-2 ring-main rounded-xl p-5 overflow-hidden z-40">
                                        <iframe src={linkIframeGame} allowFullScreen=""
                                            loading="lazy" referrerPolicy="no-referrer-when-downgrade"
                                            className="w-full h-[560px] lg:h-[360px] group-hover:scale-[1.2] top-0
                                            lg:-top-10 scale-[1.28] lg:scale-[1.1] ease-out duration-[.2s] absolute z-10"></iframe>
                                        <div className="flex flex-col sm:flex-row gap-y-6 w-full justify-end sm:justify-between items-center">
                                            <div className="grid grid-flow-col gap-5 text-center auto-cols-max">
                                                <div className="flex flex-col">
                                                    <Countdown className="font-mono text-5xl" value={15} />
                                                    days
                                                </div>
                                                <div className="flex flex-col">
                                                    <Countdown className="font-mono text-5xl" value={10} />
                                                    hours
                                                </div>
                                                <div className="flex flex-col">
                                                    <Countdown className="font-mono text-5xl" value={24} />
                                                    min
                                                </div>
                                                <div className="flex flex-col">
                                                    <Countdown className="font-mono text-5xl" value={100} />
                                                    sec
                                                </div>
                                            </div>
                                            <a href={linkGoogleGame} target="_blank" id="googleMap"
                                                className="w-min flex flex-row ease-out duration-100 bg-card_bg
                                                hover:bg-dark rounded-xl items-center py-2 px-4 z-40 sm:place-self-end sm:self-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" className="stroke-main w-6 md:w-8 mr-4 group-hover:fill-dark">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                                </svg>
                                                <p className="leading-none whitespace-nowrap">Get to the map</p>
                                            </a>
                                        </div>
                                    </div>
                        }
                        <Card.Actions className="justify-end">
                            <Button color="info">Set game card</Button>
                        </Card.Actions>
                    </Card.Body>
                </Card>
            </div>
        )
    }
}

