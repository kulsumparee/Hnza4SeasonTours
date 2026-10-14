import { useEffect, useRef, useState } from "react";

interface CounterProps {
    end: number;
    suffix?: string;
    duration?: number;
}

const Counter = ({ end, suffix = "", duration = 2000 }: CounterProps) => {
    const [count, setCount] = useState(0);
    const [start, setStart] = useState(false);
    const counterRef = useRef<HTMLSpanElement>(null);

    useEffect(() => {
        const observer = new IntersectionObserver(
            ([entry]) => {
                if (entry.isIntersecting) {
                    setStart(true);
                    observer.disconnect(); // Run only once
                }
            },
            { threshold: 0.5 }
        );

        if (counterRef.current) {
            observer.observe(counterRef.current);
        }

        return () => observer.disconnect();
    }, []);

    useEffect(() => {
        if (!start) return;

        let current = 0;
        const increment = end / (duration / 16);

        const timer = setInterval(() => {
            current += increment;

            if (current >= end) {
                setCount(end);
                clearInterval(timer);
            } else {
                setCount(Math.floor(current));
            }
        }, 16);

        return () => clearInterval(timer);
    }, [start, end, duration]);

    return (
        <span ref={counterRef}>
            {count}
            {suffix}
        </span>
    );
};

export default Counter;